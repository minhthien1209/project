import pandas as pd
from sklearn.linear_model import LinearRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_squared_error
import seaborn as sns
import matplotlib.pyplot as plt

# Đọc dữ liệu từ file CSV
data = pd.read_csv('titanic.csv')

# Xử lý dữ liệu
data = data[['Pclass', 'Sex', 'Age', 'Fare']]  # Chọn các thuộc tính quan trọng
data['Sex'] = data['Sex'].map({'male': 0, 'female': 1})  # Chuyển đổi giới tính thành số

# Loại bỏ các dòng chứa giá trị thiếu
data = data.dropna()

# Chia dữ liệu thành tập huấn luyện và tập kiểm tra
X = data.drop('Fare', axis=1)
y = data['Fare']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Xây dựng mô hình hồi quy tuyến tính
model = LinearRegression()
model.fit(X_train, y_train)

# Đánh giá mô hình trên tập kiểm tra        
y_pred = model.predict(X_test)
mse = mean_squared_error(y_test, y_pred)
# Chu thích : Dòng "print('Mean Squared Error:', mse)" được sử dụng để hiển thị giá trị Mean Squared Error (MSE), tức là sai số bình phương trung bình, của mô hình dự đoán trên tập kiểm tra. 
#MSE được tính bằng cách lấy trung bình của số bình phương của sai số giữa giá trị thực tế (y_test) và giá trị dự đoán (y_pred). Giá trị MSE càng nhỏ, mô hình dự đoán càng chính xác.
#Bằng cách in giá trị MSE ra màn hình, dòng mã trên giúp chúng ta biết độ lỗi của mô hình trên tập kiểm tra và đánh giá hiệu suất của mô hình trong việc dự đoán giá trị Fare.
print('Mean Squared Error:', mse)

# Trực quan hóa dữ liệu
# Biểu đồ phân bố của Fare
sns.histplot(data['Fare'], kde=True)
plt.xlabel('Fare')
plt.ylabel('Count')
plt.title('Distribution of Fare')
plt.show()

# Biểu đồ tương quan giữa các thuộc tính
sns.pairplot(data)
plt.show()

# Biểu đồ scatter plot giữa Fare thực tế và Fare dự đoán
plt.scatter(y_test, y_pred)
plt.xlabel('Actual Fare')
plt.ylabel('Predicted Fare')
plt.title('Actual vs Predicted Fare')
plt.show()