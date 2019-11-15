import mysql.connector
from mysql.connector import errorcode
import time


def databaseConnect(host, user, password):
    try:
        mydb = mysql.connector.connect(
            host=host,
            user=user,
            passwd=password
        )
        return mydb
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            return "couldn't connect to database"
        if err.errno == errorcode.ER_NOT_VALID_PASSWORD:
            return "wrong password"

def tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType):
    mycursor = db.cursor()
    mycursor.execute("use Election_Essentials;")
    execution = "create table " + tablename + " (" + primarykey + " " + primaryType + " PRIMARY KEY"

    for x in range(0, len(secondarykey)):
        execution += ", " + secondarykey[x] + " " + secondaryType[x]

    execution += ");"
    # print(execution)
    try:
        mycursor.execute(execution)
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
            return "exists already"
        else:
            return "syntax error"


def insertData(db, tablename, values):
    execution = 'Insert into ' + tablename + ' values' + ' ("' + values[0] + '"'

    for x in range(1, len(values)):
        execution += ', "' + values[x] + '"'

    execution += ');'
    execution = execution.replace("’", "`")
    try:
        mycursor = db.cursor()
        mycursor.execute("use Election_Essentials;")
        mycursor.execute(execution)
        db.commit()
        time.sleep(1)
    except mysql.connector.Error as err:
        return "couldn't insert into table"


def truncate(db, tablename):
    mycursor = db.cursor()
    mycursor.execute("use Election_Essentials;")
    execution = ("truncate table " + tablename + " ;")
    try:
        mycursor.execute(execution)
    except mysql.connector.Error as err:
        return "couldn't truncate table"


def tableDestroy(db, tablename):
    mycursor = db.cursor()
    mycursor.execute("use Election_Essentials;")
    execution = "DROP TABLE " + tablename + ";"
    try:
        mycursor.execute(execution)
    except mysql.connector.Error as err:
        return "table doesn't exist"

def read(db, tablename, column, filtercol, filterval):
    mycursor = db.cursor()
    mycursor.execute("use Election_Essentials;")

    execution = "Select " + column + " from " + tablename + " where " + filtercol + " = '" + filterval
    execution += "';"

    try:
        mycursor = db.cursor()
        mycursor.execute("use Election_Essentials;")
        mycursor.execute(execution)
        received = mycursor.fetchall()
        return received[0][column]
    except mysql.connector.Error as err:
        return "couldn't insert into table"

#    mycursor.execute(
#       "create table" + tablename + " (" + columnhead + " VARCHAR(80) PRIMARY KEY, " + seckey + " VARCHAR(80));")
