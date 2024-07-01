import pandas as pd
import numpy as np
data = pd.read_csv('KL_Data.csv')
combine = {'TERRACE':['TERRACE HOUSE - INTERMEDIATE','TERRACE HOUSE - CORNER LOT', 'TERRACE HOUSE - END LOT'],
     'CLUSTER':['CLUSTER HOUSE - INTERMEDIATE','CLUSTER HOUSE', 'CLUSTER HOUSE - END LOT'],
          'CONDOMINIUM':['CONDOMINIUM'], 'SERVICE RESIDENCE':['SERVICE RESIDENCE'],
           'APARTMENT':['APARTMENT'], 'FLAT':['FLAT'],
           'BUNGALOW':['BUNGALOW'], 'SEMI-D':['SEMI-D'],'TOWN HOUSE':['TOWN HOUSE']}

building = {}
for k, v in combine.items():
    for x in v:
        building[x] = k 
data['building'] = data['buildingType'].map(building)

Q1 = data['Price'].quantile(0.25)
Q3 = data['Price'].quantile(0.75)
IQR = Q3 - Q1
data = data[~((data['Price'] < (Q1 - 1.5 * IQR)) | (data['Price'] > (Q3 + 1.5 * IQR)))]

Q1 = data['Size'].quantile(0.25)
Q3 = data['Size'].quantile(0.75)
IQR = Q3 - Q1
data = data[~((data['Size'] < (Q1 - 1.5 * IQR)) | (data['Size'] > (Q3 + 1.5 * IQR)))]
# Separate target from predictors
y = data.Price
X = data.drop(['ID', 'neighbourhood', 'date', 'pricePsf', 'state','area','Price','buildingType'], axis=1)

categorical_cols = [cname for cname in X.columns if X[cname].nunique() < 10 and 
                        X[cname].dtype == "object"]
numerical_cols = ['Size','Floors']
from sklearn.preprocessing import MinMaxScaler
from sklearn.preprocessing import StandardScaler
from sklearn.compose import ColumnTransformer
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import OneHotEncoder
from sklearn.model_selection import train_test_split
from pprint import pprint 
X_train, X_valid, y_train, y_valid = train_test_split(X, y, train_size=0.8, test_size=0.2, random_state=0)
categorical_transformer =  OneHotEncoder(handle_unknown='ignore')
numerical_transformer =  MinMaxScaler()

preprocessor = ColumnTransformer(
    transformers=[
        ('num', numerical_transformer, ['Size','Floors']),
        ('cat', categorical_transformer, ['Tenure', 'building'])
    ])
from sklearn.ensemble import RandomForestRegressor
model = RandomForestRegressor(criterion="absolute_error", random_state= 0, max_features= 1, max_leaf_nodes = 850,
                              max_depth=25, min_samples_leaf = 1,
                              min_samples_split= 2, n_estimators= 380)

from sklearn.metrics import mean_absolute_error

# Bundle preprocessing and modeling code in a pipeline
my_pipeline1 = Pipeline(steps=[('preprocessor', preprocessor),
                              ('model', model)
                             ])

# Preprocessing of training data, fit model 
my_pipeline1.fit(X_train, y_train)

# Preprocessing of validation data, get predictions
preds = my_pipeline1.predict(X_valid)

# Evaluate the model
score = mean_absolute_error(y_valid, preds)
errors = abs(preds - y_valid)
mape = 100 * (errors / y_valid)
accuracy = 100 - np.mean(mape)
import pickle 
filename='rfmodel2.sav'
pickle.dump(my_pipeline1,open(filename,'wb'))
