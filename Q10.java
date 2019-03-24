package CycleSheet;

import java.util.Random;


public class dev{

	private  static int[] votes = new int[240];
	private static volatile int i =0;
	private static int countA=0;
	private static int countB=0;
	private static int countC=0;

	private static Object lock1 = new Object();
	private static Object lock2 = new Object();
	private static Object lock3 = new Object();





	public static void  countVotesA(int n) throws ArrayIndexOutOfBoundsException{

		synchronized(lock1) {

		if(votes[n] == 1) {
			countA++;
			i++;

		}
		}

	}

	public static void  countVotesB(int n) throws ArrayIndexOutOfBoundsException{

		synchronized(lock2) {
		if(votes[n] == 2) {
			countB++;
			i++;

			}
		}

	}

	public static void  countVotesC(int n) throws ArrayIndexOutOfBoundsException{

		synchronized(lock3) {
		if(votes[n] == 3) {
			countC++;
			i++;

			}
		}

	}

	public static void process() {
		for(;i<240;) {
			try {
		countVotesA(i);
		countVotesB(i);
		countVotesC(i);
		}catch(ArrayIndexOutOfBoundsException e) {

		}
		}


	}


	public static void main(String[] args) {

		System.out.println("Starting Count ");
		Random ran = new Random();
		for(int j=0;j<240;j++) {
			votes[j] = ran.nextInt(3) + 1;

		}





		Thread t1 = new Thread(new Runnable() {

			@Override
			public void run() {
				process();
			}

		});

		Thread t2 = new Thread(new Runnable() {

			@Override
			public void run() {
				process();
			}

		});

		Thread t3 = new Thread(new Runnable() {

			@Override
			public void run() {
				process();
			}

		});

		Thread t4 = new Thread(new Runnable() {

			@Override
			public void run() {
				process();
			}

		});

		t1.start();
		t2.start();
		t3.start();
		t4.start();


		try {
			t1.join();
			t2.join();
			t3.join();
			t4.join();
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		System.out.println("\nVotes for A " +  countA);
		System.out.println("Votes for B " +  countB);
		System.out.println("Votes for C " +  countC);
		System.out.println("\nCount Complete ");



	}

}
