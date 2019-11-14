import unittest
import dbFunctions
import webScraperFunctions
import validators

host = '35.188.54.9'
username = 'Adri'
password = ''
class TestCalc(unittest.TestCase):


    def test_connect(self):
        self.assertIsNotNone(dbFunctions.databaseConnect(host, username, password))

    def test_create(self):
        db = dbFunctions.databaseConnect(host,username,password)
        tablename = "newTable"
        primarykey = "primvar"
        primaryType = "VARCHAR(80)"
        secondarykey = ["val1", "val2"]
        secondaryType = ["VARCHAR(80)", "VARCHAR(80)"]

        output = dbFunctions.tableCreate(db, tablename, primarykey, primaryType, secondarykey, secondaryType)
        self.assertIsNone(output)

    def test_destroy(self):
        db = dbFunctions.databaseConnect(host,username,password)
        tablename = "newTable"
        output = dbFunctions.tableDestroy(db, tablename)
        self.assertIsNone(output)

    def test_insert(self):

        db = dbFunctions.databaseConnect(host, username, password)
        tablename = "newTable"
        values = ["var1", "var2", "var3"]
        output = dbFunctions.insertData(None, tablename, values)




    def test_url(self):
        url = webScraperFunctions.getURL("jobs", 0)
        output = validators.url(url)
        self.assertTrue(output)

    def test_getContent(self):
        output = webScraperFunctions.getContent("https://www.cnn.com/travel/article/qantas-test-flight-london-sydney-nonstop/index.html")
        self.assertFalse(output == "bad url")

    def test_getContent_badURL(self):
        output = webScraperFunctions.getContent("www")
        self.assertTrue(output == "bad url")

if __name__ == '__main__':
    unittest.main()