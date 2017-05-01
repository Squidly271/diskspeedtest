#!/bin/bash

mkdir -p "/tmp/GitHub/diskspeedtest/source/diskspeedtest/usr/local/emhttp/plugins/diskspeedtest/"

cp /usr/local/emhttp/plugins/diskspeedtest/* /tmp/GitHub/diskspeedtest/source/diskspeedtest/usr/local/emhttp/plugins/diskspeedtest -R -v -p
rm -rf /tmp/GitHub/diskspeedtest/source/diskspeedtest/usr/local/emhttp/plugins/diskspeedtest/scripts/diskspeed.html
rm -rf /tmp/GitHub/diskspeedtest/source/diskspeedtest/usr/local/emhttp/plugins/diskspeedtest/history

