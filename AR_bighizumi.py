import cv2
from cv2 import aruco
import numpy as np

img1 = cv2.imread(r"C:\Users\toroh\Pictures\Camera Roll\sennoutantei_chihaya.png")

IP_list = ["192.168.0.37", "172.22.69.141", "192.168.0.8"]
cap = cv2.VideoCapture()
print("IPアドレスを選択してください")
print("0:192.168.0.37\n1:177.22.69.141\n2:192.168.0.8")
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

def img_henkan(img1):
    global pts_src
    
    size = img1.shape
    pts_src = np.array(
                        [
                        [0, 0],
                        [size[1] - 1, 0],
                        [size[1] - 1, size[0] - 1],
                        [0, size[0] - 1]
                        ],dtype=float
                    )
    return
def ConvImg(corners, i, img, convimg):
    x1 = (corners[i][0][0][0], corners[i][0][0][1])
    x2 = (corners[i][0][1][0], corners[i][0][1][1])
    x3 = (corners[i][0][2][0], corners[i][0][2][1])
    x4 = (corners[i][0][3][0], corners[i][0][3][1])

    pts_dst = np.array([x1, x2, x3, x4])
    h, status = cv2.findHomography(pts_src, pts_dst)
    temp = cv2.warpPerspective(convimg.copy(), h, (img.shape[1], img.shape[0]))
    cv2.fillConvexPoly(img, pts_dst.astype(int), 0, 16)
    img = cv2.add(img, temp)
    
    return img

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
    
    img_henkan(img1)
    
    img = aruco.drawDetectedMarkers(img, corners, ids)
    try:
        for i in range(len(ids)):
            if ids[i] == 1:
                img = ConvImg(corners, i, img, img1)
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


#print(cap.get(cv2.CAP_PROP_FPS))
#print(frame.shape)

#print(corners[0][0][0][0])
