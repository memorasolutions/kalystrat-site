# Configuration téléphonie — Kalystrat

> Date : 2026-04-17
> Statut : ACTIF (Ali seulement) — en attente des cellulaires des autres membres
> DID : 418-476-0987 (routé vers IVR)

## Composants créés sur VoIP.ms

| Composant | ID | Détail |
|-----------|:--:|--------|
| DID | 4184760987 | Routing: ivr:105522, préfixe clt-, note "Kalystrat" |
| Boîte vocale | 98700 | "Kalystrat - Accueil", pin 4768, email info@kalystrat.ca, delete=yes |
| Sous-compte | 810533 | 227018_kalystrat-87, ext 98701, VM 98700 |
| Renvoi Ali | 2213715 | → 581-578-6145 |
| Groupe Ali | 143449 | Kaly-AliSalomo, 25s, VM 98700 |
| Groupe Réception | 143450 | Kaly-Reception (Ali seul pour l'instant), 25s, VM 98700 |
| Condition Réception | 39848 | Lun-ven 8h30-17h → sous-compte / hors → VM 98700 |
| Condition Ali | 39849 | Lun-ven 8h30-17h → renvoi Ali / hors → VM 98700 |
| IVR | 105522 | Kalystrat-IVR-accueil, recording 282021, timeout 10s |
| Enregistrement | 282021 | "Kalystrat accueil" (MP3 uploadé manuellement) |

---

## 1. Informations générales

| Champ | Valeur |
|-------|--------|
| Entreprise | Kalystrat |
| Description | Investissement stratégique et développement |
| DID principal | 418-476-0987 |
| Domaine | kalystrat.ca |
| Courriel générique | info@kalystrat.ca |
| Adresse | Québec, QC, G1G 3C9 |
| Préfixe caller ID | kly- |
| Langue | Français |
| Musique d'attente | Easy Listening |

---

## 2. Message d'accueil IVR

**Fichier** : `.telephonie/accueil.mp3`
**Voix** : Arabella (Studio) — French (Canada) — UnmiXR
**Texte** :
```
Bonjour et bienvenue chez Kalystrat, investissement stratégique et développement.
Nous vous remercions de votre appel et il nous fera plaisir de vous accompagner dans vos projets.
Si vous connaissez le poste de la personne que vous désirez joindre, composez-le maintenant.
Sinon, restez en ligne, nous transférons votre appel vers la réception. Merci!
```
**Comportement** : pas de menu à choix multiples. Transfert automatique vers réception si aucune touche.
**Touche 0** : transfert vers boîte vocale compagnie.

---

## 3. Équipe et extensions

| # | Prénom | Nom | Extension | Cellulaire | Courriel | Rôle |
|---|--------|-----|:---------:|------------|----------|------|
| 1 | Ali Salomon | Zakzuk Gaviria | 101 | 581-578-6145 | ali.salomon@kalystrat.ca | Propriétaire / dirigeant |
| 2 | Nathalia | Benavidez Nino | 102 | ⚠️ À OBTENIR | n.nino@kalystrat.ca | Contact principal |
| 3 | Amed Elias | Zakzuk Fonseca | 103 | ⚠️ À OBTENIR | amed.z@kalystrat.ca | Investissements |
| 4 | Monica Maria | Benavides Nino | 104 | ⚠️ À OBTENIR | m.nino@kalystrat.ca | — |
| 5 | Monica | Nino Tellez | 105 | ⚠️ À OBTENIR | monica.nino@kalystrat.ca | — |

> **BLOQUÉ** : Ali doit envoyer les numéros de cellulaire et confirmer quelles personnes auront une extension téléphonique active. (Demandé lors de la rencontre du 9 avril.)

---

## 4. Horaires proposés

En l'absence d'horaires confirmés par le client, voici la proposition standard :

| Personne | Semaine | Weekend | Hors horaire |
|----------|---------|---------|--------------|
| Réception (groupe) | Lun-ven 8h30-17h00 | Fermé | → Boîte vocale compagnie |
| Ali Salomon (101) | Lun-ven 8h30-17h00 | Fermé | → Boîte vocale compagnie |
| Nathalia (102) | Lun-ven 8h30-17h00 | Fermé | → Boîte vocale compagnie |
| Amed (103) | Lun-ven 8h30-17h00 | Fermé | → Boîte vocale compagnie |
| Monica M. (104) | Lun-ven 8h30-17h00 | Fermé | → Boîte vocale compagnie |
| Monica N. (105) | Lun-ven 8h30-17h00 | Fermé | → Boîte vocale compagnie |

> ⚠️ **À CONFIRMER** avec Ali. La transcription de la rencontre mentionne que les horaires peuvent être configurés plus tard.

---

## 5. Configuration VoIP.ms — Étapes détaillées

### 5.1 Enregistrements audio (Numéros DID → Enregistrements)

| Fichier | Nom dans VoIP.ms | Source |
|---------|-------------------|--------|
| accueil.mp3 | Kalystrat-Accueil | .telephonie/accueil.mp3 |

### 5.2 Boîte vocale compagnie (Numéros DID → Messagerie Vocale)

| Champ | Valeur |
|-------|--------|
| Numéro | 98700 |
| Mot de passe | (à générer — 4 chiffres) |
| Nom | Kalystrat - Accueil |
| Enregistrement non dispo | 0000-Boite vocale par defaut FR |
| Courriel avis | info@kalystrat.ca |
| Supprimer après envoi | Oui |
| Langue | Français |

### 5.3 Sous-compte principal (Sous-comptes → Création)

| Champ | Valeur |
|-------|--------|
| Nom d'utilisateur | kalystrat-87 |
| Mot de passe | (à générer — 12 caractères) |
| Caller ID | 4184760987 - Quebec |
| Musique | Easy Listening |
| Langue | Français |
| Description | Kalystrat-investissement-strat |
| No poste interne | 987000001 |
| Messagerie vocale | 98700 |

### 5.4 Renvois d'appel (Numéros DID → Renvoi d'appels)

| # | Cellulaire | Description | Extension |
|---|------------|-------------|:---------:|
| 1 | 5815786145 | Kalystrat - Ali Salomon - Cellulaire | 101 |
| 2 | ⚠️ À OBTENIR | Kalystrat - Nathalia Benavidez - Cellulaire | 102 |
| 3 | ⚠️ À OBTENIR | Kalystrat - Amed Zakzuk - Cellulaire | 103 |
| 4 | ⚠️ À OBTENIR | Kalystrat - Monica Benavides - Cellulaire | 104 |
| 5 | ⚠️ À OBTENIR | Kalystrat - Monica Nino - Cellulaire | 105 |

### 5.5 Groupes de sonnerie (Numéros DID → Groupes de sonnerie)

**IMPORTANT : 1 groupe par personne** (pour message de transfert + musique pro)

| # | Description (15 car max) | Annonce | Musique | Membres |
|---|--------------------------|---------|---------|---------|
| 1 | Kaly-Reception | 0001-Merci patientez transfert FR | Easy listening | Tous les renvois actifs |
| 2 | Kaly-AliSalomo | 0001-Merci patientez transfert FR | Easy listening | Renvoi Ali (101) |
| 3 | Kaly-NathBenav | 0001-Merci patientez transfert FR | Easy listening | Renvoi Nathalia (102) |
| 4 | Kaly-AmedZakzu | 0001-Merci patientez transfert FR | Easy listening | Renvoi Amed (103) |
| 5 | Kaly-MoniBenav | 0001-Merci patientez transfert FR | Easy listening | Renvoi Monica M. (104) |
| 6 | Kaly-MoniNinoT | 0001-Merci patientez transfert FR | Easy listening | Renvoi Monica N. (105) |

### 5.6 Conditions temporelles (Numéros DID → Conditions Temporelles)

| # | Nom (pas d'accent) | Horaire | Destination ouverte | Destination fermée |
|---|-------------------|---------|--------------------|--------------------|
| 1 | Kaly-Reception | Lun-ven 8h30-17h00 | Groupe: Kaly-Reception | Boîte vocale: 98700 |
| 2 | Kaly-AliSalomon | Lun-ven 8h30-17h00 | Groupe: Kaly-AliSalomo | Boîte vocale: 98700 |
| 3 | Kaly-NathBenavi | Lun-ven 8h30-17h00 | Groupe: Kaly-NathBenav | Boîte vocale: 98700 |
| 4 | Kaly-AmedZakzuk | Lun-ven 8h30-17h00 | Groupe: Kaly-AmedZakzu | Boîte vocale: 98700 |
| 5 | Kaly-MoniBenavi | Lun-ven 8h30-17h00 | Groupe: Kaly-MoniBenav | Boîte vocale: 98700 |
| 6 | Kaly-MoniNinoTe | Lun-ven 8h30-17h00 | Groupe: Kaly-MoniNinoT | Boîte vocale: 98700 |

### 5.7 IVR — Réceptionniste virtuelle (Numéros DID → Réceptionniste virtuelle)

| Champ | Valeur |
|-------|--------|
| Nom | Kalystrat-IVR-accueil |
| Message d'accueil | Enregistrement : Kalystrat-Accueil |
| Timeout (aucune touche) | → Condition temporelle : Kaly-Reception |
| Touche 0 | → Boîte vocale : 98700 |
| Extension 101 | → Condition temporelle : Kaly-AliSalomon |
| Extension 102 | → Condition temporelle : Kaly-NathBenavi |
| Extension 103 | → Condition temporelle : Kaly-AmedZakzuk |
| Extension 104 | → Condition temporelle : Kaly-MoniBenavi |
| Extension 105 | → Condition temporelle : Kaly-MoniNinoTe |

### 5.8 Configuration DID (Numéros DID → Gestion des DID)

| Champ | Valeur |
|-------|--------|
| DID | 418-476-0987 |
| Routing | IVR : Kalystrat-IVR-accueil |
| Messagerie vocale associée | 98700 |
| Temps de sonnerie | 25 secondes |
| Préfixe caller ID | kly- |
| Note | Kalystrat |
| SMS/MMS | À activer |
| SMS transfert courriel | info@kalystrat.ca |

### 5.9 Compte client revendeur

| Champ | Valeur |
|-------|--------|
| Prénom | Ali Salomon |
| Nom | Zakzuk Gaviria |
| Entreprise | Kalystrat |
| Courriel | info@kalystrat.ca |
| Mot de passe | (à générer — pas de symboles) |
| Téléphone | 418-476-0987 |
| Paquet | Gratuit |
| Sous-compte | kalystrat-87 |

---

## 6. Chaîne d'appel complète

```
Appel entrant → 418-476-0987
  → IVR (message accueil Kalystrat)
    → Si extension composée (101-105)
      → Condition temporelle de la personne
        → SI ouvert → Groupe de sonnerie individuel (message transfert + musique)
          → Renvoi cellulaire
            → Si pas de réponse (25s) → Boîte vocale compagnie (98700)
        → SI fermé → Boîte vocale compagnie (98700)
    → Si touche 0
      → Boîte vocale compagnie (98700)
    → Si aucune touche (timeout)
      → Condition temporelle Réception
        → SI ouvert → Groupe de sonnerie Réception (sonne tous les cellulaires actifs)
          → Si pas de réponse → Boîte vocale compagnie
        → SI fermé → Boîte vocale compagnie
```

---

## 7. Ce qui est BLOQUÉ (attendre Ali)

1. ❌ Numéros de cellulaire de Nathalia, Amed, Monica M., Monica N.
2. ❌ Confirmation des personnes qui auront une extension active
3. ❌ Horaires personnalisés (si différents de lun-ven 8h30-17h)
4. ❌ Confirmation si toutes les 5 personnes reçoivent les appels ou seulement certaines

## 8. Ce qui est PRÊT à exécuter maintenant

1. ✅ DID 418-476-0987 (déjà sur le compte)
2. ✅ Message accueil MP3 (accueil.mp3)
3. ✅ Extension 101 — Ali Salomon avec cellulaire 581-578-6145
4. ✅ Boîte vocale compagnie
5. ✅ Sous-compte principal
6. ✅ Préfixe kly-
7. ✅ IVR de base (même sans toutes les extensions, on peut configurer Ali + réception)
