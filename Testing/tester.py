import unittest
import dbFunctions
import webScraperFunctions
import validators

host = '35.223.188.180'
username = 'root'
password = '123456'

tablename = "newTable"
primarykey = "primvar"
primaryType = "VARCHAR(80)"
secondarykey = ["val1", "val2"]
secondaryType = ["VARCHAR(80)", "VARCHAR(80)"]
class TestCalc(unittest.TestCase):


    def test_connect(self):
        self.assertIsNotNone(dbFunctions.databaseConnect(host, username, password))

    def test_connect_wrong_host(self):
        username = "Tom"
        output = dbFunctions.databaseConnect(host, username, password)
        self.assertTrue(output == "couldn't connect to database")

    def test_create(self):
        db = dbFunctions.databaseConnect(host,username,password)
        output = dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        self.assertIsNone(output)
        dbFunctions.tableDestroy(db, tablename)

    def test_create_dup(self):
            db = dbFunctions.databaseConnect(host, username, password)
            dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
            output = dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
            self.assertTrue(output == "exists already" )
            dbFunctions.tableDestroy(db, tablename)

    def test_destroy(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        db = dbFunctions.databaseConnect(host,username,password)
        output = dbFunctions.tableDestroy(db, tablename)
        self.assertIsNone(output)

    def test_destroy_fake(self):
        db = dbFunctions.databaseConnect(host,username,password)
        tablename = "newTable"
        output = dbFunctions.tableDestroy(db, tablename)
        self.assertTrue(output == "table doesn't exist")

    def test_insert(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3"]
        output = dbFunctions.insertData(db, tablename, values)
        dbFunctions.tableDestroy(db, tablename)

    def test_insert_wrong_table(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3"]
        output = dbFunctions.insertData(db, "faketable", values)
        self.assertTrue(output == "couldn't insert into table")
        dbFunctions.tableDestroy(db, tablename)


    def test_insert_wrong_parameters(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3", "var4"]
        output = dbFunctions.insertData(db, tablename, values)
        self.assertTrue(output == "couldn't insert into table")
        dbFunctions.tableDestroy(db, tablename)

    def test_insert_fake_table(self):
        db = dbFunctions.databaseConnect(host, username, password)
        tablename = "newTable"
        values = ["var1", "var2", "var3"]
        output = dbFunctions.insertData(db, tablename, values)
        self.assertTrue(output == "couldn't insert into table")


    def test_url(self):
        url = webScraperFunctions.getURL("jobs", 0)
        output = validators.url(url)
        self.assertTrue(output)

    def test_url_wrong_essential(self):
        url = webScraperFunctions.getURL("fake", 0)
        self.assertTrue(url == "couldn't find essential")

    def test_url_out_of_range(self):
        url = webScraperFunctions.getURL("jobs", 10)
        self.assertTrue(url == "article number too high")

    def test_truncate(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3"]
        dbFunctions.insertData(db, tablename, values)
        output = dbFunctions.truncate(db, tablename)
        self.assertIsNone(output)
        dbFunctions.tableDestroy(db, tablename)

    def test_getContent(self):
        output = webScraperFunctions.getContent("https://www.cnn.com/travel/article/qantas-test-flight-london-sydney-nonstop/index.html")
        self.assertFalse(output == "bad url")

    def test_getContent_badURL(self):
        output = webScraperFunctions.getContent("www")
        self.assertTrue(output == "bad url")

    def test_getTitle(self):
        output = webScraperFunctions.getTitle("Jobs", 9)
        self.assertIsNotNone(output)

    def test_getTitle_badTitle(self):
        output = webScraperFunctions.getTitle("fakeTitle", 1)
        self.assertTrue(output == "couldn't find essential" )

    def test_getTitle_outOfRange(self):
        output = webScraperFunctions.getTitle("Jobs", 10)
        self.assertTrue(output == "article number too high")


    def test_getData(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3"]
        dbFunctions.insertData(db, tablename, values)
        output = dbFunctions.read(db, tablename, "val1", "primvar", "var1")
        self.assertTrue(output[0][0] == "var2")
        dbFunctions.tableDestroy(db, tablename)

    def test_getData_wrong_table(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3"]
        dbFunctions.insertData(db, tablename, values)
        output = dbFunctions.read(db, "faketable", "val1", "primvar", "var1")
        self.assertTrue(output == "wrong column or tablename")
        dbFunctions.tableDestroy(db, tablename)

    def test_getData_wrong_column(self):
        db = dbFunctions.databaseConnect(host, username, password)
        dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        values = ["var1", "var2", "var3"]
        dbFunctions.insertData(db, tablename, values)
        output = dbFunctions.read(db, tablename, "val1", "primvar", "vaar1")
        self.assertTrue(output == "filter value doesn't exist")
        dbFunctions.tableDestroy(db, tablename)



if __name__ == '__main__':
    unittest.main()