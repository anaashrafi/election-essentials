import urllib.request, json
from datetime import date

# candidates  = {"trump": "+donald+trump",
#         "biden": "+joe+biden", 
#         "sanders": "+bernie+sanders"}

topics = {"Jobs": "jobs",
        "Healthcare": "healthcare",
        "CJS": "criminal+justice+system",
        "Environment": "environment",
        "Education": "education",
        "Gun Violence": "+gun+violence",
        "Immigration": "immigration",
        "Taxes": "taxes",
        "LGBTQ": "lgbtq",
        "Reproductive Issues": "abortion"}

# for candidate in candidates.keys():
#     getUrl = "https://newsapi.org/v2/everything?q=" + candidates[candidate] + "&language=en&sortBy=relevancy&apiKey=7ed7b7405fa84630879ef25babb23b1a"
#     with urllib.request.urlopen(getUrl) as url:
#         data = json.loads(url.read().decode())
#         filename = candidate + ".json"
#         if filename:
#         # Writing JSON data
#             with open(filename, 'w') as f:
#                 json.dump(data, f)

for topic in topics.keys():
    getUrl = "https://newsapi.org/v2/everything?q=" + topics[topic] + "&language=en&sortBy=relevancy&apiKey=7ed7b7405fa84630879ef25babb23b1a"
    with urllib.request.urlopen(getUrl) as url:
        data = json.loads(url.read().decode())
        filename = topic + ".json"
        if filename:
        # Writing JSON data
            with open(filename, 'w') as f:
                json.dump(data, f)