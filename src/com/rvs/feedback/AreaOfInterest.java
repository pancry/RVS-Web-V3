package com.rvs.feedback;

public class AreaOfInterest {
	private int id; 
	private int aoi;
	
	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getAoi() {
		return aoi;
	}

	public void setAoi(int aoi) {
		this.aoi = aoi;
	}

	@Override
	public String toString() {
		return "AreaOfInterest [id=" + id + ", aoi=" + aoi + "]";
	}
	
}
