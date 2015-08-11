#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
  /* Enter your code here. Read input from STDIN. Print output to STDOUT */   

  int *arr, *arr2;
  int count=0;
  cin>>count;
  int s=0;
  while(count>0)
  {
    int m=0;
    int j=0;
    int y=0;
    cin>>s;
    arr=new int [s];

    for(int i=0;i<s;i++){

      arr[i]=i+1;
    }

    m=((s-1)/2);
    j=m+1;
    if(s%2==1){
      cout<<arr[m] <<" ";
      m--;
    }
    for(int i=0;m>=0 && j<=s;i++)
    {

      cout<<arr[m] <<" "<<arr[j]<<" ";
      m--; j++;

    }
    cout<<endl;
    delete []arr;
    arr=0;
    count--;
  }


  return 0;
}

