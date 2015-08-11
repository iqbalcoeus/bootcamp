#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
  /* Enter your code here. Read input from STDIN. Print output to STDOUT */   
  int k=0;
  int n=0;
  int j=0;
  int count=0;
  int * arr;
  cin>>n;
  if(n==2)
  {
    cout<<1;
    return 0;
  }
  arr=new int[n];
  for(int i=0;i<n;i++)
  {

    arr[i]=0;
  }

  cin>>k;
  for(int i=0;i<k;i++)
  {
    cin>>j;
    arr[j-1]=1;

  }
  int i=0;
  for( i=0;i<n;i++)
  {
    if(arr[i]==1)
      break;
  }
  int pi=i;
  i=(i+2);

  for(;i<n;)
  {
    if(arr[i]==0)
    {
      if(i+1<n && arr[i+1]==0)
        arr[i]=1;
      else if(i+1==n)
        arr[i]=1;
    }
    if(arr[i]==0 && i+1<n && arr[i+1]==1)
      i=i+1;
    else
      i=(i+2);
  }

  for(int i=0;i<pi;)
  {

    if(arr[i]==0 && arr[i+1]==0)
      arr[i]=1;
    else if(arr[i]==0 && arr[i+1]==1)
      i=i+1;
    else
      i=i+2;
  }
  for(int m=0;m<n;m++)
  {
    if(arr[m]==1)
      count=count+1;

  }
  cout<<count;

  delete []arr;
  arr=0;

  return 0;
}

