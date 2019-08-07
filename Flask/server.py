from flask import Flask, render_template
import pandas as pd
import requests
import openpyxl

df = pd.read_csv("/Flask/static/train.csv")
app = Flask(__name__)


@app.route('/')
def home():
    df = pd.read_csv("/Flask/static/train.csv")
    df = df.head()
    return render_template('home.html', tables=[df.to_html()])


@app.route('/reverse_odd')
def reverse():
    df = pd.read_csv("/Flask/static/train.csv")
    reverse = df[df.columns[::-1]]
    reverse.to_csv("/Flask/static/reverse.csv")
    reverse = pd.read_csv("/jojolion/static/reverse.csv", index_col=0)
    reverse = reverse.head()
    odd_cols = df[df.columns[::2]]
    odd_cols.to_csv("/Flask/static/odd_cols.csv")
    odd_cols = pd.read_csv("/Flask/static/odd_cols.csv", index_col=0)
    odd_cols = odd_cols.head()
    return render_template('reverse_odd.html', tables=[reverse.to_html(), odd_cols.to_html()], titles=['na', 'Reversed Columns', 'Odd Columns'])


@app.route('/msft')
def msft():
    API_KEY = 'demo'
    r = requests.get(
        'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=MSFT&interval=5min&apikey=' + API_KEY)
    if (r.status_code == 200):
        result = r.json()
        msft = pd.DataFrame(result['Time Series (5min)'])
        msft = msft.transpose()
        msft.to_excel("/Flask/static/msft_dailyquotes.xlsx")
        msft = msft.head()
        return render_template('msft.html', tables=[msft.to_html()])


if __name__ == "__main__":
    app.run(port=5000, threaded=True, host=('0.0.0.0'))
