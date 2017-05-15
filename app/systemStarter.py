import threading
import mysql.connector
import time
import requests
created=[]
def handler():
    connection=mysql.connector.connect(user='root',password='',host='localhost',database='onlinequestionpapergeneratingsystem')
    mycursor=connection.cursor()
    now=int(time.time())
    now=now
    print now
    past=now-5
    future=now+5
    mycursor.execute("SELECT * FROM papers WHERE %s<=deadline AND deadline<=%s",(past,future,))
    data=mycursor.fetchall()
    for paper in data:
        if paper[0] not in created:
            created.extend([paper[0]])
            i=paper[0]
            r = requests.post('http://localhost:8000/testtrial', data = {'id':i})
            print r.content
            print paper[0]
    threading.Timer(5.0, handler).start()
    print "Checking!"

handler()
