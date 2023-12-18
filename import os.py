import os 
for i in range(10):
    i += 1
    if i != 10:
        Height = '0.' + str(i) + "m"
    elif i == 10:
        Height = "1.0m"
    for j in range(10):
        j += 1
        dirname = r"H:/picture/ffmpeg/" + Height + "_" + str(j)
        os.mkdir(dirname)
