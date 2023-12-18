import cv2
import numpy as np
# ArUcoのライブラリを導入
from cv2 import aruco
# 4x4のマーカ, IDは50までの辞書を使用
dictionary = aruco.getPredefinedDictionary(aruco.DICT_4X4_50)
aruco = cv2.aruco