import pickle
import sys
import pandas as pd
import numpy as np

load_model = pickle.load(open('rfmodel2.sav','rb'))

tenure = sys.argv[1]
size = sys.argv[2]
floors =  float(sys.argv[3])
latitude = float(sys.argv[4])
longitude = float(sys.argv[5])
building = sys.argv[6]
    
array = np.array([[tenure, size, floors, latitude, longitude, building]])
pred = pd.DataFrame(array, columns=['Tenure', 'Size','Floors','latitude','longitude','building'])

output = load_model.predict(pred)
print(output[0])