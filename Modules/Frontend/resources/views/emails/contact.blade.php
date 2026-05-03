<h2>Nouveau message Kalystrat</h2>
<ul>
    <li>Nom&nbsp;: {{ $nom }}</li>
    <li>Courriel&nbsp;: {{ $email }}</li>
    <li>Téléphone&nbsp;: {{ $telephone ?? '–' }}</li>
    <li>Filiale&nbsp;: {{ $filiale ?? 'général' }}</li>
    <li>Budget&nbsp;: {{ $budget ?? '–' }}</li>
    <li>Échéance&nbsp;: {{ $echeance ?? '–' }}</li>
    <li>Message&nbsp;:<br>{!! nl2br(e($message)) !!}</li>
</ul>
