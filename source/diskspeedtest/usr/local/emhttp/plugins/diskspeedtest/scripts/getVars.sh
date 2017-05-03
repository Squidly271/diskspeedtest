#!/bin/bash
mkdir -p /tmp/diskspeed/
rm -rf /tmp/diskspeed/varFlag
wget --quiet --output-document=/tmp/diskspeed/diskspeedvars.txt http://localhost/Tools/Vars
echo "done" > /tmp/diskspeed/varFlag
