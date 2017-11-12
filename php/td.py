#!/usr/bin/env python

import nltk
from rake_nltk import Rake

r = Rake() 
text = "He established an appeal to raise funds for local hospitals in memory of the dead as well as a physical monument. He commissioned Lutyens, who designed an empty tomb (cenotaph) atop a low screen wall from which protrudes a Stone of Remembrance. Bronze flambeaux at either end can burn gas to emit a flame. Lutyens also designed a roll of honour, on which the names of the city's dead are listed, which was installed in Norwich Castle in 1931."
r.extract_keywords_from_text(text)
l = r.get_ranked_phrases()
p = l[:min(len(l)/3,20)]
d = {}
for i in p:
    a = i.split(' ')
    for j in a:
        d[j] = 1
s = ""
for i in d:
    s += i
    s+= " "

import MySQLdb

db=MySQLdb.connect(user="root",passwd="",db="aprl",unix_socket="/opt/lampp/var/mysql/mysql.sock")
cursor = db.cursor()

try:
    cursor.execute("UPDATE blog SET description = '%s' ORDER BY date DESC LIMIT 1" % s)
    db.commit()
except:
    print "kata"

db.close()
#print r.get_ranked_phrases()[:10]"""




