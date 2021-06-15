from matplotlib import pyplot as plt
from skimage import data
from skimage.feature import blob_dog, blob_log, blob_doh
from math import sqrt
from skimage.color import rgb2gray
import glob
from skimage.io import imread
example_file = glob.glob(r"C:\wamp\www\eradar\analisis\contoh.jpg")[0]
im = imread(example_file, as_grey=True)
cm_gray = plt.get_cmap(‘gray’)
plt.show()