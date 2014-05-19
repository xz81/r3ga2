#-*- coding: utf-8 -*-
#!/usr/bin/python
import time, urllib, json, urllib2, sqlite3
from urllib import quote_plus

API = "aeda2c456069369dd9159ca25504a020"
feedID = 7
periodo_de_datos = 1 #en dias

sec_per_day = 60 * 60 * 24
end = (int(time.time()))
start = (end - (periodo_de_datos * sec_per_day))
print start
print end

data_url = "http://192.168.1.104/emoncms/feed/data.json?apikey=" + API + "&id=" + str(feedID) + "&start=" + str(start*1000) + "&end=" + str(end*1000) + "&dp=800"
print data_url

