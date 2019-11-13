# Python code to illustrate and create a
# table in database
import sys
sys.path.insert(0, 'lib')

import mysql.connector
from mysql.connector import errorcode

import json
from pprint import pprint

import newspaper
from newspaper import Article

import urllib

dict = {}
try:
    cnx = mysql.connector.connect(user='root', host='35.188.54.9', password='D6qs1FPzuOdE6JFu', database='Election_Essentials')
    #cnx = mysql.connector.connect(user='root', host='35.223.188.180', password='123456', database='guestbook')
    #sql_select_Query = "SELECT * from tasks"
    #sql_update_Query = ("UPDATE article" "SET title = %s, body = %s")
    sql_insert_Query = ("INSERT INTO Ar_Ti_To_Ar" "(Title,Article)" "VALUES(%s,%s)")
    sql_insert_essential_Query = ("INSERT INTO Es_To_Ar_Ti" "(Essential,Title1)" "VALUES(%s,%s)")
    sql_delete_Query = ("truncate table Ar_Ti_To_Ar")
    cursor = cnx.cursor()
    #cursor.execute(sql_select_Query)
    #records = cursor.fetchall()
    cursor.execute(sql_delete_Query)
    sql_delete_Query = ("truncate table Es_To_Ar_Ti")
    cursor.execute(sql_delete_Query)


    #Read from json file

    topics = ["Taxes",
            "Healthcare",
            "CJS",
            "Jobs",
            "Environment",
            "Education",
            "Gun Violence",
            "Immigration",
            "LGBTQ",
            "Reproductive Issues"]
    for essential in topics:
        for x in range(10):
            try:
                with open(essential + '.json') as f:
                    data = json.load(f)
                    data_article = data["articles"][x]
                    arg1 = (essential, data_article['title'])
                    url = data_article['url']
                    # check = urllib.urlopen(url)
                    # if check.getcode() == 404:
                    #     x += 1
                    #     data_article = data["articles"][x]
                    #     arg1 = (essential, data_article['title'])
                    #     cursor.execute(sql_insert_essential_Query, arg1)
                    #     url = data_article['url']
                    #     print("Alternative article: " + url)
                    cursor.execute(sql_insert_essential_Query, arg1)
                    article = Article(url)
                    article.download()
                    article.parse()
                    # y = article.parse()
                    # print(y)
                    content = str(article.text)
                    content = content.replace('Advertisement', '')
                    arg2 = (data_article['title'], content)
                    #print(content)
                    #print(arg)
                    if data_article['title'] not in dict.keys():
                        cursor.execute(sql_insert_Query, arg2)
                        dict[data_article['title']] = True
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
