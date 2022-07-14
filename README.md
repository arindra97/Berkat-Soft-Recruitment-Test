# Berkat-Soft-Recruitment-Test

## task 1
implements containLetters function that given two words, return true if fall all the letters of the first word are contained in the second.
Boolean containLetters(string firstWord, string secondWord).

Ex:
```
containLetters(‘brs’, ‘berkatsoft’) => returns true
containLetters(‘brs’, ‘berkatco’) => returns false
containLetters(‘brs’, ‘BERKATsoft’) => returns true
```

Penyelesaian:
Saya mengerjakan task ini dengan cara membuat sebuah fungsi yang menampung 2 string (firstWord dan secondWord),
kemudian string tersebut saya jadikan array menggunakan function build in dari php yaitu ```array_split()```
setelah itu saya membuat array kosong dengan nama variable ```$penampung``` untuk menampung character yang sama dari kedua string dengan menggunakan regex.

Setelah mendapatkan sebuah array yang berisikan character yang sama dari kedua string tersebut, saya menggabungkan array tersebut menjadi sebuah string baru dengan function php yaitu ```implode()```
dimana string baru ini sebagai pembanding fungsi regex untuk mengembalikan nilai true apabila pattern yang baru berisikan kata yang ada pada string baru. 
