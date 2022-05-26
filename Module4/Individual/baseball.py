#!/usr/bin/env python
# -*- coding: utf-8 -*-


import re
import sys, os

from numpy import bitwise_and

# readfilename='cardinals-1940.txt'

if len(sys.argv) < 2:
    sys.exit(f"Usage: python3 {sys.argv[0]} filePath")

filename = sys.argv[1]
if not os.path.exists(filename):
    sys.exit(f"Error: File '{sys.argv[1]}' not found")

class Player:
    def __init__(self, name, bats, hits,runs,avg):
        self.name=name
        self.bats=bats
        self.hits=hits
        self.runs=runs
        self.avg=avg

players={}
f = open(filename, "r")
regex = re.compile('(?P<name>.*) batted (?P<bats>\d) times with (?P<hits>\d) hits and (?P<runs>\d) runs')
for line in f:
    found = 0
    each_line = regex.match(line)
    if not each_line:
        continue
    name, bats, hits,runs = each_line.groups()
    bats=int(bats)
    hits=int(hits)
    runs=int(runs)
    if name in players:
        players[name].name=name
        players[name].bats+=bats
        players[name].hits+=hits
        players[name].runs+=runs
    else:
        players[name]=Player(name,bats,hits,runs,0)
f.close()
for key in players:
    if players[key].bats!=0:
        avg = round(float(players[key].hits) / float(players[key].bats),3)
        players[key].avg=avg


players = sorted(players.items(), key=lambda item: item[1].avg, reverse=True)

for player in players:
    print("%s: %.3f" % (player[1].name, player[1].avg))
