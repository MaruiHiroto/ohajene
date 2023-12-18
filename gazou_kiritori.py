import cv2
import pathlib

input_dir = r"C:\Users\toroh\Pictures\chihaya_all\soukonosouko"
output_dir = r"C:\Users\toroh\Pictures\chihaya_all\true_gazou_noneji"

image_list = list(pathlib.Path(input_dir).glob("**/*.png"))
for i in range(len(image_list)):

    img = cv2.imread(str(image_list[i]))
    j = i + 137
    img1 = img[10 : 817, 390 : 1402]
    output_path = output_dir + "/chihaya" + str(j) + ".png"
    cv2.imwrite(output_path, img1)