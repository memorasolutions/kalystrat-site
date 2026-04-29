<div class="popup-search-box">
    <button class="searchClose" aria-label="Fermer la recherche"><i class="ri-close-line" aria-hidden="true"></i></button>
    <form action="{{ route('index') }}" method="GET" role="search" aria-label="Recherche sur le site">
        <input type="text" name="q" placeholder="Rechercher sur Kalystrat..." aria-label="Terme de recherche" required>
        <button type="submit" aria-label="Lancer la recherche"><i class="ri-search-line" aria-hidden="true"></i></button>
    </form>
</div>
