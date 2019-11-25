# Python code to illustrate and create a
# table in database

import urllib.request, json
from datetime import date

import sys
sys.path.insert(0, 'lib')

import mysql.connector
from mysql.connector import errorcode

from pprint import pprint

import newspaper
from newspaper import Article


topics = {"Jobs": "jobs",
        "Healthcare": "healthcare",
        "CJS": "criminal+justice+system",
        "Environment": "environment",
        "Education": "education",
        "Gun Violence": "+gun+violence",
        "Immigration": "immigration",
        "Taxes": "taxes",
        "LGBTQ": "lgbtq",
        "Reproductive Issues": "abortion"}

dataList = {}

for topic in topics.keys():
    getUrl = "https://newsapi.org/v2/everything?q=" + topics[topic] + "&language=en&sortBy=relevancy&apiKey=7ed7b7405fa84630879ef25babb23b1a"
    with urllib.request.urlopen(getUrl) as url:
        data = json.loads(url.read().decode())
        dataList[topic] = data

duplicate = {}

#Connect to database
print('\nConnecting to database')
try:
    cnx = mysql.connector.connect(user='root', host='35.188.54.9', password='D6qs1FPzuOdE6JFu', database='Election_Essentials')
    sql_insert_Query = ("INSERT INTO Ar_Ti_To_Ar" "(Title,Article)" "VALUES(%s,%s)")
    sql_insert_essential_Query = ("INSERT INTO Es_To_Ar_Ti" "(Essential,Title1)" "VALUES(%s,%s)")
    sql_delete_Query = ("truncate table Ar_Ti_To_Ar")
    cursor = cnx.cursor()
    cursor.execute(sql_delete_Query)
    sql_delete_Query = ("truncate table Es_To_Ar_Ti")
    cursor.execute(sql_delete_Query)

    #Push data into database
    for essential in topics.keys():
        for x in range(10):
            try:
                data = dataList[essential]
                data_article = data["articles"][x]
                arg1 = (essential, data_article['title'])
                url = data_article['url']

                article = Article(url)
                article.download()
                article.parse()

                cursor.execute(sql_insert_essential_Query, arg1)
                content = str(article.text)
                content = content.replace('Advertisement', '')
                arg2 = (data_article['title'], content)
                if data_article['title'] not in duplicate.keys():
                    cursor.execute(sql_insert_Query, arg2)
                    duplicate[data_article['title']] = True
                print(url)

            except newspaper.article.ArticleException as err:
                print("Couldn't download article")
                pass
    cnx.commit()
    cursor.close()
    cnx.close()

except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist")
        else:
            print(err)
