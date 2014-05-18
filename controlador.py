#-*- coding: utf-8 -*-
#!/usr/bin/python
import time
import urllib
import json
import urllib, urllib2
import sqlite3 # sudo apt-get sqlite3

API= "50a5528a2f06bec6f75a67227a82cad5" # emoncms API key
feedID=16 # emoncms feed id

sec_per_day = 60 * 60 * 24
end = (int(time.time()))                #now
start = (end - (1 * sec_per_day))       #1 days ago

data_url = "http://localhost/feed/data.json?apikey=" + API +"&id=" + str(feedID) + "&start=" + str(start*1000) + "&end=" + str(end*1000) + "&dp="

# read in the data from emoncms
try:
        sock = urllib.urlopen(data_url)
        data_str = sock.read()
        sock.close
except Exception, detail:
        print "Error ", detail

data = json.loads(data_str)

conn = sqlite3.connect(":memory:")
conn.execute ("""
                CREATE TABLE feed (
                  time INTEGER,
                  data REAL );
             """)

#Load the JSON data from EmonCMS into a table
x=0
for row in data:
    conn.execute("INSERT INTO feed (time, data) VALUES (?,?)",
                 (str(data[x][0]),float(data[x][1]))
                )
    x+=1

#print "\nEntire table contents:\n"
#for row in conn.execute("SELECT * FROM feed"):
#    print row

result = conn.execute("SELECT MAX(data) FROM feed")
res = result.next()[0]
print "Max value: " + str(res)

result = conn.execute("SELECT MIN(data) FROM feed")
res = result.next()[0]
print "Min value: " + str(res)

result = conn.execute("SELECT AVG(data) FROM feed")
res = result.next()[0]
print "Avg value: " + str(res)
