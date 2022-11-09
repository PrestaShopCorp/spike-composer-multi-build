#!/bin/bash

if [ ! $TARGETS ]; then
    TARGETS=$PWD/../../../../targets
fi

if [ ! $BUILD_ZIPS ]; then
    BUILD_ZIPS=$PWD/../../../../builds/zips
fi

if [ ! $BUILD_BIN ]; then
    BUILD_BIN=$PWD
fi

if [ $1 != "legacy" ] && [ $1 != "v3" ]; then
    echo "You must pass application version (legacy/v3) as parameter to build this application."
    exit
fi

$BUILD_BIN/composer-install.sh $1
mkdir -p $BUILD_ZIPS
cd $TARGETS && zip -r $BUILD_ZIPS/app-$1.zip $1
