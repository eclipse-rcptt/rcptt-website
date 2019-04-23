#! /bin/bash
set -e
rm -r output_prod
sculpin generate --env=prod

./deploy.sh
