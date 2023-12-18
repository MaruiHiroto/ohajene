from mutagen.easyid3 import EasyID3
import os

dir_path = r"C:\Users\toroh\Music\radio_maiden_after100"

files = os.listdir(dir_path)
number = 99
for i in files:
    
    file_path = i
    tags = EasyID3(i)
    tags["title"] = "第" + str(number) + "回オトメ＊ドメイン RADIO＊MAIDEN"
    tags["tracknumber"] = str(number)
    tags.save()
    number = number + 1