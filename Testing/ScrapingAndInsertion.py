import webScraperFunctions
import dbFunctions

host = '35.188.54.9'
username = 'Adri'
password = ''

db = dbFunctions.databaseConnect(host,username,password)
esToArtTi = "Es_To_Ar_Ti"
arTiToArt = "Ar_Ti_To_Ar"
topics = ["Jobs",
        "Healthcare",
        "CJS",
        "Economy",
        "Environment",
        "Education",
        "Gun Violence",
        "Immigration",
        "LGBTQ",
        "Reproductive Issues"]
dbFunctions.truncate(db, esToArtTi)
dbFunctions.truncate(db, arTiToArt)
for essential in topics:
    for x in range (10):
        title = webScraperFunctions.getTitle(essential, x)
        if title == "couldn't find essential":
            print("failed to get article title: " + essential + " " + str(x))
        article = webScraperFunctions.getContent(webScraperFunctions.getURL(essential, x))
        if article is None or article == "bad url":
            print("failed to get article data: " + essential + " " + str(x))
        print(dbFunctions.insertData(db, esToArtTi, [essential, title]))            # Need to debug this part. It sends data but the database does not update
        print(dbFunctions.insertData(db, arTiToArt, [title, article]))