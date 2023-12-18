import cv2

im = cv2.imread("chihaya_aikon_01.png")

print(type(im))

print(im.shape)

while(True):
    cv2.imshow("chihayakisaragi", im)
    
    if cv2.waitKey(1) & 0xFF == ord("c"):
        break