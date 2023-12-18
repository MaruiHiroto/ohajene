from PIL import Image
import pathlib

input_dir = r"C:\Users\toroh\Pictures\chihaya_all\true_gazou"
output_dir = r"C:\Users\toroh\Pictures\chihaya_all\chihaya_million"

image_list = list(pathlib.Path(input_dir).glob("**/*.png"))

for i in range(len(image_list)):
    im = Image.open(str(image_list[i]))
    im_rotate = im.rotate(90, resample=Image.BICUBIC, expand=True)
    output_path = output_dir + "/chihaya" + str(i) + ".png"
    im.save(output_path)