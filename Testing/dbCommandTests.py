import mysql.connector
import databaseTest

import get_news
import read_news

def getAndReceiveTest():
    mydb = mysql.connector.connect(
        host="35.188.54.9",
        user="Adri",
        passwd=" "
    )
    columnhead = "testkey"
    table = "Tester"
    primkey = "primkey"
    seckey = "seckey"

    mycursor = mydb.cursor()
    mycursor.execute("use Election_Essentials;")
    mycursor.execute("create table" + table + " ("+columnhead +" VARCHAR(80) PRIMARY KEY, " + seckey +  " VARCHAR(80));")


    databaseTest.sendData(table, primkey,seckey)
    received = databaseTest.getData(table, seckey,columnhead,primkey)

    assert received[0]['seckey'] == "seckey"

    mycursor.execute("DROP TABLE " + table + ";")

def testgetnews():
    received = get_news.getNews()
    assert received != None

def testReadNewsContent():
    get_news.getNews()
    assert read_news.readNewsContent() is not None


def testReadNewsTitle():
    get_news.getNews()
    assert read_news.readNewsTitle() is not None