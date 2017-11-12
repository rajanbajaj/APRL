#!/usr/bin/env python

import nltk
from rake_nltk import Rake
import MySQLdb

db=MySQLdb.connect(user="root",passwd="",db="aprl",unix_socket="/opt/lampp/var/mysql/mysql.sock")
cursor = db.cursor()
cursor.execute("SELECT description FROM blog ORDER BY date DESC LIMIT 1")
text = cursor.fetchone()[0]
r = Rake() 
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



try:
    cursor.execute("UPDATE blog SET keywords = '%s' ORDER BY date DESC LIMIT 1" % s)
    db.commit()
except:
    pass

db.close()
#print r.get_ranked_phrases()[:10]"""



