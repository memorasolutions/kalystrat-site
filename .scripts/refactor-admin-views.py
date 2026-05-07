#!/usr/bin/env python3
"""
Refactore 66 vues admin Blade : déplace help-modal vers @section('page-actions')
et supprime le bloc h4 introductif redondant avec le page-header layout.

Pattern AVANT (multiligne, position variable) :
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-X">
      <h4 ...>{{ __('TITRE') }}</h4>
      <x-backoffice::help-modal id="..." ...>
          @include('...')
      </x-backoffice::help-modal>
  </div>

Pattern APRÈS :
  Bloc supprimé + insertion AVANT @section('content') :

  @section('page-actions')
      <x-backoffice::help-modal id="..." ...>
          @include('...')
      </x-backoffice::help-modal>
  @endsection
"""
import re
import sys
from pathlib import Path

LIST_FILE = "/tmp/admin-views-to-refactor.txt"

# Match le bloc div parent multiligne contenant h4/h1/h5 + help-modal
# Pattern : <div class="d-flex ... mb-X">...<x-backoffice::help-modal ...>...</x-backoffice::help-modal>...</div>
DIV_PATTERN = re.compile(
    r'<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-\d+">'
    r'(.*?)'
    r'</div>\n',
    re.DOTALL
)

# Match le help-modal complet à l'intérieur du bloc
HELP_MODAL_PATTERN = re.compile(
    r'(<x-backoffice::help-modal[^>]*>.*?</x-backoffice::help-modal>)',
    re.DOTALL
)

# Match @section('content')
CONTENT_SECTION_PATTERN = re.compile(r'^@section\([\'"]content[\'"]\)\s*$', re.MULTILINE)


def refactor_file(filepath: Path) -> str:
    """Refactore un fichier Blade. Retourne 'OK', 'SKIP' ou 'ERR: <msg>'."""
    try:
        content = filepath.read_text(encoding='utf-8')
    except Exception as e:
        return f"ERR: read {e}"

    # Vérifier que la vue a help-modal
    if "<x-backoffice::help-modal" not in content:
        return "SKIP: no help-modal"

    # Trouver le bloc div parent
    div_match = DIV_PATTERN.search(content)
    if not div_match:
        return "SKIP: no matching div block"

    inner = div_match.group(1)

    # Vérifier qu'il y a un h1/h4/h5 dans le bloc (sinon c'est pas le bon pattern)
    if not re.search(r'<h[1-5]\s', inner):
        return "SKIP: no heading in div"

    # Extraire help-modal
    help_match = HELP_MODAL_PATTERN.search(inner)
    if not help_match:
        return "SKIP: no help-modal in div"

    help_modal = help_match.group(1)

    # Indenter le help-modal pour insertion dans @section
    indented_help_modal = '\n'.join('    ' + line if line.strip() else line
                                     for line in help_modal.split('\n'))

    # Construire la nouvelle section page-actions
    page_actions_section = f"@section('page-actions')\n{indented_help_modal}\n@endsection\n\n"

    # Supprimer le bloc div ENTIER
    content_without_div = DIV_PATTERN.sub('', content, count=1)

    # Insérer page-actions juste AVANT @section('content')
    content_match = CONTENT_SECTION_PATTERN.search(content_without_div)
    if not content_match:
        return "ERR: no @section('content') found"

    insert_pos = content_match.start()
    new_content = (
        content_without_div[:insert_pos]
        + page_actions_section
        + content_without_div[insert_pos:]
    )

    try:
        filepath.write_text(new_content, encoding='utf-8')
    except Exception as e:
        return f"ERR: write {e}"

    return "OK"


def main():
    with open(LIST_FILE) as f:
        files = [line.strip() for line in f if line.strip()]

    project_root = Path("/Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat")

    stats = {"OK": 0, "SKIP": 0, "ERR": 0}
    skipped = []
    errored = []

    for relpath in files:
        full = project_root / relpath
        if not full.exists():
            stats["ERR"] += 1
            errored.append(f"{relpath} :: file not found")
            continue

        result = refactor_file(full)
        if result == "OK":
            stats["OK"] += 1
        elif result.startswith("SKIP"):
            stats["SKIP"] += 1
            skipped.append(f"{relpath} :: {result}")
        else:
            stats["ERR"] += 1
            errored.append(f"{relpath} :: {result}")

    print("=" * 60)
    print(f"  REFACTORING ADMIN VIEWS — STATS")
    print("=" * 60)
    print(f"  OK    : {stats['OK']:>3}")
    print(f"  SKIP  : {stats['SKIP']:>3}")
    print(f"  ERR   : {stats['ERR']:>3}")
    print(f"  TOTAL : {sum(stats.values()):>3}")
    print("=" * 60)

    if skipped:
        print("\nSKIPPED:")
        for s in skipped[:20]:
            print(f"  - {s}")
        if len(skipped) > 20:
            print(f"  ... and {len(skipped) - 20} more")

    if errored:
        print("\nERRORED:")
        for e in errored[:20]:
            print(f"  - {e}")

    sys.exit(0 if stats["ERR"] == 0 else 1)


if __name__ == "__main__":
    main()
