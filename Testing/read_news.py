import json

def readNewsContent():
    with open('trump.json') as f:
        data = json.load(f)
        # How to get content in JSON
        for article in data["articles"]:
            print(article["title"])
            print(article["content"])
            print()
            return article["content"]


def readNewsTitle():
    with open('trump.json') as f:
        data = json.load(f)
        # How to get content in JSON
        for article in data["articles"]:
            print(article["title"])
            print(article["content"])
            print()
            return article["title"]

