import mysql.connector





def sendData(tablename, value1, value2):
    mydb = mysql.connector.connect(
        host="35.188.54.9",
        user="Adri",
        passwd=" "
    )
    mycursor = mydb.cursor()
    mycursor.execute("use Election_Essentials;")
    mycursor.execute('insert into ' + tablename + ' values (' + value1 + ', ' +value2 + ');')
    return mycursor.fetchall()


def getData(tablename, columnheader, discriminator, discTitle ):
    mydb = mysql.connector.connect(
        host="35.188.54.9",
        user="Adri",
        passwd=" "
    )
    mycursor = mydb.cursor()
    mycursor.execute("use Election_Essentials;")
    mycursor.execute('Select ' + columnheader + ' from ' + tablename + ' where ' + discriminator + ' = "' + discTitle + '";');
    return mycursor.fetchall()






