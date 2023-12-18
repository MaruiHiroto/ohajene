import requests
from bs4 import BeautifulSoup
import time
page_url = "https://momon-ga.com/fanzine/mo2513091/"
r = requests.get(page_url)
time.sleep(2)
soup = BeautifulSoup(r.text, "html.parser")
img_tags = soup.find_all("img")
img_urls = []

for img_tag in img_tags:
    url = img_tag.get("src")
    img_urls.append(url)
i = 1
for img_data in img_urls:
    re = requests.get(img_data)
    with open(str("./momonga/")+"img_"+str(i)+str(".jpeg"), "wb") as f:
        f.write(re.content)
    i += 1
    time.sleep(7)
print("finished")