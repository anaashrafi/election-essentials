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

    topics = ["Military",
            "Healthcare",
            "CJS",
            "Economy",
            "Environment",
            "Education",
            "Gun Violence",
            "Immigration",
            "LGBTQ",
            "Reproductive Issues"]
    for essential in topics:
        for x in range(2):
            with open(essential + '.json') as f:
                data = json.load(f)
                data_article = data["articles"][x]
                arg1 = (essential, data_article['title'])
                cursor.execute(sql_insert_essential_Query, arg1)
                url = data_article['url']
                print(url)
                article = Article(url)
                article.download()
                article.parse()
                content = str(article.text)
                content = content.replace('Advertisement', '')
                arg2 = (data_article['title'], content)
                #print(content)
                #print(arg)
                cursor.execute(sql_insert_Query, arg2)

    #Number of Rows
    #print("Total number of rows", cursor.rowcount)

    #Print the data
    # print("\nPrinting each row")
    # for row in records:
    #     print("task_id = ", row[0])
    #     print("title = ", row[1])
    #     print("start_date = ", row[2])
    #     print("status = ", row[4])
    #     print("priority = ", row[5])
    #     print("created_at = ", row[7])

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Something is wrong with your user name or password")
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Database does not exist")
except:
    print("error")
else:
    cnx.commit()
    cursor.close()
    cnx.close()
