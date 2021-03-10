#!/bin/bash

THEMEDIR="yourThemeDirectoryHere"

cd wp-content/themes/$THEMEDIR
npm audit | grep Critical -B3 -A10
npm run watch-bs
