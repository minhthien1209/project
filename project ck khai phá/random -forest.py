import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score


import seaborn as sns
import matplotlib.pyplot as plt

# Đọc dữ liệu từ file CSV
data = pd.read_csv('titanic.csv')

# Xử lý dữ liệu
data = data[['Pclass', 'Sex', 'Age', 'Survived']]  # Chọn các thuộc tính quan trọng
data['Sex'] = data['Sex'].map({'male': 0, 'female': 1})  # Chuyển đổi giới tính thành số

# Loại bỏ các dòng chứa giá trị thiếu
data = data.dropna()

# Chia dữ liệu thành tập huấn luyện và tập kiểm tra
X = data.drop('Survived', axis=1)
y = data['Survived']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Xây dựng mô hình Random Forest
model = RandomForestClassifier()
model.fit(X_train, y_train)

# Đánh giá mô hình trên tập kiểm tra
y_pred = model.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)
print('Accuracy:', accuracy)

# Vẽ biểu đồ cột tỉ lệ sống sót theo Pclass
survived_by_pclass = data.groupby(['Pclass', 'Survived']).size().unstack()
survived_by_pclass.plot(kind='bar', stacked=True, color=['red', 'green'])
plt.title('Survival by Pclass')
plt.xlabel('Pclass')
plt.ylabel('Count')
plt.show()