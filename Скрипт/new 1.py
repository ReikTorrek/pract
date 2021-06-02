import os

path = "D:/Xampp/htdocs/htdocs/Valhalla/2020/pract/music/KISH"

files = []

for file in os.listdir(path):
    if file.endswith(".mp3"):
        files.append(file)

sql = ""
for file in files:
    album = file.title().split("-")[0].strip()
    title = file.title().split("-")[1].strip().replace(".mp3", "").replace(".Mp3", "").replace(".MP3", "")
    sql += "INSERT INTO songs (name, album, link) VALUES (\"" + title + "\",\"" + album + "\", \"" + file + "\");\n"

print(sql)