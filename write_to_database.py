# Python code to illustrate and create a
# table in database
import sys
sys.path.insert(0, 'lib')

import mysql.connector
from mysql.connector import errorcode

import json
from pprint import pprint


try:
    cnx = mysql.connector.connect(user='root', host='35.223.188.180', password='123456', database='guestbook')
    sql_select_Query = "SELECT * from tasks"
    #sql_update_Query = ("UPDATE article" "SET title = %s, body = %s")
    sql_insert_Query = ("INSERT INTO article" "(title,body)" "VALUES(%s,%s)")
    cursor = cnx.cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()

#Read from json file
    with open('trump.json') as f:
        data = json.load(f)
        data_article = data["articles"][2]
        arg = (data_article['title'], data_article['content'])
        print(arg)
        cursor.execute(sql_insert_Query, arg)

    #Number of Rows
    print("Total number of rows", cursor.rowcount)

    #Print the data
    print("\nPrinting each row")
    for row in records:
        print("task_id = ", row[0])
        print("title = ", row[1])
        print("start_date = ", row[2])
        print("status = ", row[4])
        print("priority = ", row[5])
        print("created_at = ", row[7])

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Something is wrong with your user name or password")
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Database does not exist")
    else:
        print(err)
else:
    cnx.commit()
    cursor.close()
    cnx.close()