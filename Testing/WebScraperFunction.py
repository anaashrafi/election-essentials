import json
from newspaper import Article

def getURL(essential, articleNum):
    if(articleNum > 9):
        return "article number too high"
    try:
        with open(essential + '.json') as f:
            data = json.load(f)
            data_article = data["articles"][articleNum]
            url = data_article['url']
            return url
    except:
        return ("couldn't find essential")

def getTitle(essential, articleNum):
    if (articleNum > 9):
        return "article number too high"
    try:
        with open(essential + '.json') as f:
            data = json.load(f)
            data_article = data["articles"][articleNum]
            title = data_article['title']
            return title
    except:
        return "couldn't find essential"
def getContent (url):

    try:
        article = Article(url)
        article.download()
        article.parse()
        return article.text
    except:
        return "bad url"

