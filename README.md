# Wustrow Galerie

Eine kleine PHP/HTML-Galerie fuer Fotos und Videos.

## Was das Projekt macht

- `index.html` zeigt die Medien im Vollbild an
- `generate.php` scannt den Ordner `images/` rekursiv
- Bilder und Videos werden als JSON an den Browser geliefert
- Fotos koennen EXIF-Daten fuer Datum und Schlagworte anzeigen
- Ein Ordner kann direkt per URL-Parameter `?folder=...` angewählt werden
- Der Ordnername oben ist klickbar und oeffnet eine kleine Auswahl

## Datei- und Ordnerstruktur

- `index.html` Hauptansicht der Galerie
- `generate.php` erzeugt die Medialiste
- `images/` lokaler Medienbestand, nicht im Git-Repository
- `manifest.json` PWA-Metadaten
- `icon192.png` App-Icon fuer Homescreen / Installation

## Hinweise

- Der Ordner `images/` ist in `.gitignore`, damit keine Bilddateien im Repository landen
- Die Datei `.htpasswd` ist ebenfalls ignoriert und wird nicht versioniert
- Die Galerie laeuft direkt aus einem PHP-faehigen Webserver heraus
- Ohne `folder`-Parameter startet die Galerie normal mit allen Medien

## Betrieb

1. Projektverzeichnis auf einen PHP-Webserver legen
2. Bilder und Videos in `images/` ablegen
3. `index.html` im Browser oeffnen
4. Optional einen Ordner ueber `?folder=2025` oder einen Klick auf den Titel waehlen

## GitHub

Das Projekt ist als Repository `jochenhaertel/wustrow` angelegt.
Wenn neue Medien lokal hinzugefuegt werden, bleiben sie ausserhalb von Git.
