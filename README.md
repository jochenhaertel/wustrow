# Wustrow Galerie

Eine kleine PHP/HTML-Galerie fuer Fotos und Videos.

## Was das Projekt macht

- `index.html` zeigt die Medien im Vollbild an
- `generate.php` scannt den Ordner `images/` rekursiv
- Bilder und Videos werden als JSON an den Browser geliefert
- Fotos koennen EXIF-Daten fuer Datum und Schlagworte anzeigen

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

## Betrieb

1. Projektverzeichnis auf einen PHP-Webserver legen
2. Bilder und Videos in `images/` ablegen
3. `index.html` im Browser oeffnen

## GitHub

Das Projekt ist als Repository `jochenhaertel/wustrow` angelegt.
Wenn neue Medien lokal hinzugefuegt werden, bleiben sie ausserhalb von Git.
