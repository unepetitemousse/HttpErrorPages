#!/bin/bash
set -e

php generator.php config-FR.ini fr_FR
php generator.php config-EN.ini en_US
php generator.php config-ES.ini es_ES

aws s3 cp dist/fr/ s3://static.unepetitemousse.fr/static/fr-errors/ --recursive --include '*.html'
#aws s3 cp dist/en/ s3://static.unepetitemousse.fr/static/en-errors/ --recursive --include '*.html'
#aws s3 cp dist/es/ s3://static.unepetitemousse.fr/static/es-errors/ --recursive --include '*.html'
