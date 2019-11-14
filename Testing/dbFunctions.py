import mysql.connector
from mysql.connector import errorcode



def databaseConnect(host, user, password):
    try:
        mydb = mysql.connector.connect(
            host= host,
            user= user,
            passwd= password
        )
        return mydb
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            return "couldn't connect to database"


def tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType):
    mycursor = db.cursor()
    mycursor.execute("use Election_Essentials;")
    execution = "create table " + tablename + " (" + primarykey + " " + primaryType + " PRIMARY KEY"

    for x in range (0, len(secondarykey)):
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
    mycursor = db.cursor()
    mycursor.execute("use Election_Essentials;")

    execution = 'Insert into ' + tablename + ' values' + ' ("' + values[0] + '"'

    for x in range (1, len(values)):
        execution += ', "' + values[x] + '"'

    execution += ');'
    execution = execution.replace("’", "`")
    try:
        mycursor.execute(execution)
        print(execution)
    except mysql.connector.Error as err:
        return "couldn't insert into table: " + execution


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
        if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
            return "exists already"
        else:
            return "syntax error"


#    mycursor.execute(
#       "create table" + tablename + " (" + columnhead + " VARCHAR(80) PRIMARY KEY, " + seckey + " VARCHAR(80));")









