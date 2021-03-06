import urllib.request, json
from datetime import date

def getNews():
    candidates  = {"trump": "+donald+trump",
            "biden": "+joe+biden",
            "sanders": "+bernie+sanders"}
    topics = {"military": "military",
            "healthcare": "healthcare"}
    for candidate in candidates.keys():
        getUrl = "https://newsapi.org/v2/everything?q=" + candidates[candidate] + "&language=en&sortBy=relevancy&apiKey=7ed7b7405fa84630879ef25babb23b1a"
        with urllib.request.urlopen(getUrl) as url:
            data = json.loads(url.read().decode())
            filename = candidate + ".json"
            if filename:
            # Writing JSON data
                with open(filename, 'w') as f:
                    json.dump(data, f)

    for topic in topics.keys():
        getUrl = "https://newsapi.org/v2/everything?q=" + topics[topic] + "&language=en&sortBy=relevancy&apiKey=7ed7b7405fa84630879ef25babb23b1a"
        data
        with urllib.request.urlopen(getUrl) as url:
            data = json.loads(url.read().decode())
            filename = topic + ".json"
            if filename:
            # Writing JSON data
                with open(filename, 'w') as f:
                    json.dump(data, f)
    return data