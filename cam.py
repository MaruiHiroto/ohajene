import cv2
from cv2 import aruco
import numpy as np
img1 = cv2.imread(r"C:\Users\toroh\Pictures\chihaya\1d70addc-s.jpg")
#画像の縦横比保存
height, width = img1.shape[:2]
global hosei
hosei = height / width
num_id_1 = 4
num_id_2 = 2

IP_list = ["192.168.0.37", "172.22.69.141", "192.168.0.22"]
cap = cv2.VideoCapture()
print("WiFiのIPアドレスはどれですか?")
print("0:192.168.0.37\n1:177.22.69.141\n2:192.168.0.22")
print("72:この中にない")
print("55:終了する")
ip = int(input())
if ip == 72:
    print("IPアドレスを入力してください")
    ip_self = input()

    cap.open('http://' + ip_self + ':7255/video')
elif ip == 55:
    print("プログラムを終了します。")
    exit()
else:
    cap.open('http://' + IP_list[ip] + ':7255/video')

def getMarkerMean(ids, corners, index):
    for i, id in enumerate(ids):
        if(id[0] == index):
            cornerUL = corners[i][0][0]
            cornerUR = corners[i][0][1]
            cornerBR = corners[i][0][2]
            cornerBL = corners[i][0][3]
            
            center = [int((cornerUL[0]+cornerBR[0])/2), int((cornerUL[1]+cornerBR[1])/2)]
            
            return center
        
def get_point_corners(ids, corners):
    corners, ids, rejectedImgPoints = aruco.detectMarkers(img, aruco_dict, parameters=parameters)

    upper_mean = (getMarkerMean(ids, corners, 2))

    bottom_mean = (getMarkerMean(ids, corners, 4))
    
    bottom_mean = [upper_mean[0], bottom_mean[1]]
    return upper_mean, bottom_mean

while(True):
    
    ret, frame = cap.read()
    if not ret:
        print('can\'t receive frame')
        cv2.destroyAllWindows()
        break

    #frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    gray = cv2.cvtColor(frame, cv2.COLOR_RGB2GRAY)

    aruco_dict = aruco.Dictionary_get(aruco.DICT_4X4_50)
    parameters = aruco.DetectorParameters_create()
    
    
    
    Height, Width = frame.shape[:2]
    
    img = cv2.resize(frame,(int(Width),int(Height)))
    
    corners, ids, rejectedlmgPoints = aruco.detectMarkers(img, aruco_dict, parameters=parameters)
    
    img = aruco.drawDetectedMarkers(img, corners, ids)
    try:
   
            point_corners_u, point_corners_b = get_point_corners(ids, corners)
            point_corners_u = tuple(point_corners_u)
            point_corners_b = tuple(point_corners_b)
            img = cv2.arrowedLine(img, point_corners_u,
                            point_corners_b,
                            color=(206, 131, 128), thickness=3)
            cv2.imshow("B72", img)
            k = cv2.waitKey(1)
            if k == ord("c"):
                cv2.destroyAllWindows()              
                break       
    except:
        
        cv2.imshow("B72", img)
        k = cv2.waitKey(1)
        if k == ord("c"):
            cv2.destroyAllWindows()
            break

print(point_corners_u)
print(point_corners_b)